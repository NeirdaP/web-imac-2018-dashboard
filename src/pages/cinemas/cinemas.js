import React, { Component } from 'react';

// COMPONENTS TO IMPORT
import Adresse from './components/adresse/adresse.js';
import Sieges from './components/seats/seats.js';
import Ecrans from './components/ecrans/ecrans.js';
import RepartitionDuPublic from './components/repartitiondupublic/repartitiondupublic.js';
import RepartitionDeLaProduction from './components/repartitiondelaproduction/repartitiondelaproduction.js';
import CaracteristiquesDesFilmsDiffuses from './components/caracteristiquesfilmsdiffuses/caracteristiquesfilmsdiffuses.js';


// STYLE OF THE COMPONENT
import './cinemas.css';

// AXIOS FOR THE API CALL
import axios from "axios";

class Cinemas extends Component {

	// CONSTRUCTOR
	constructor(props) {
		super(props);

		this.state = {
			cinemas: [],
			searchWord: '',
			artHouse: "2",
			screens: {min: null, max: null},
			seats: {min: null, max: null},
			freq: {min: null, max: null},
			age: {min: null, max: null},
			showCinema: false
		}

		this.setParameters = this.setParameter.bind(this);
		this.setSearchword = this.setSearchword.bind(this);
		this.search = this.search.bind(this);
		this.showResult = this.showResult.bind(this);
		this.addMovie = this.addMovie.bind(this);
		this.componentDidMount = this.componentDidMount.bind(this);
	}

	//SETTERS
	setParameter(name, value){
		switch(name){
			default:
				console.log('Erreur: switch default in setParameter(name, value).');
				this.setState({
					name: value
				});
				break;
		}
	}

	// SETTERS
	setSearchword(searchWord){
		this.setParameter('searchWord', searchWord);
	}

	// ADD A MOVIE TO THE APP
	addMovie(){
		console.log("Here should be the call for the creation of a movie");
	}

	// AJAX Call
	componentDidMount(){
		axios
			.get("http://back.cinemas-parisiens.fr/cinemas")
			.then(response => {
				console.log(response);
				const newCinemas = response.data.map(c => {
				  return {
					name: c.name,
					latitude: c.latitude,
					longitude: c.longitude,
					numberOfSeat: c.numberOfSeat,
					numberOfScreen: c.numberOfScreen,
					artHouse: c.artHouse
				  };
				});

				// create a new "State" object without mutating the original State object.
				const newState = Object.assign({}, this.state, {
				  cinemas: newCinemas
				});

				// store the new state object in the component's state
				this.setState(newState);
			})
			.catch(error => console.log(error));
	}

	// RENDER THE COMPONENT
	render() {
		const showCinema = this.state.showCinema;

		// TO SHOW THE LIST OR THE SEARCH FILTERS
		const cinema = showCinema ? (
			<Cinema showResult={this.showResult} cinemas={this.state.cinemas} />
		) : (
			<div className="component Cinema">
					<div className="adresse">
						<Adresse />
					</div>

					<div className="ecrans">
						<Ecrans />
					</div>

					<div className="sieges">
						<Sieges />
					</div>

					/*<div className="repartitiondupublic">
						<RepartitionDuPublic />
					</div>

					<div className="repartitiondelaproduction">
						<RepartitionDeLaProduction />
					</div>

					<div className="caracteristiquesfilmsdiffuses">
						<CaracteristiquesDesFilmsDiffuses />
					</div>*/
			</div>
		);

		return (
			<div className="Home">
					<div className="component cinema">
					<div className="component Cinema">
							<div className="adresse">
								<Adresse />
							</div>

							<div className="ecrans">
								<Ecrans />
							</div>

							<div className="sieges">
								<Sieges />
							</div>

							/*<div className="repartitiondupublic">
								<RepartitionDuPublic />
							</div>

							<div className="repartitiondelaproduction">
								<RepartitionDeLaProduction />
							</div>

							<div className="caracteristiquesfilmsdiffuses">
								<CaracteristiquesDesFilmsDiffuses />
							</div>*/
					</div>
					</div>
					<button className="addMovieButton" onClick={this.addMovie}><img src={addMovie} alt="addMovie"></img></button>
			</div>
		);
	}
}

export default Cinemas;
