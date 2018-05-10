import React, { Component } from 'react';
import './App.css';
import Searchbar from '../searchbar/searchbar.js';
import Filterbyseat from '../filterbyseat/filterbyseat.js';
import axios from "axios";

class App extends Component {

	// CONSTRUCTOR
	constructor(props) {
		super(props);

		this.state = {
			cinemas: [],
			parameters: {
				searchWord: '',
				screens: {min: null, max: null},
				seats: {min: null, max: null},
				age: {min: null, max: null}
			}
		}

		this.setParameters = this.setParameter.bind(this);
		this.setSearchword = this.setSearchword.bind(this);
		this.setScreens = this.setScreens.bind(this);
		this.setAge = this.setAge.bind(this);
		this.search = this.search.bind(this);
		this.componentDidMount = this.componentDidMount.bind(this);

		this.printState = this.printState.bind(this);
	}

	//SETTERS
	setParameter(name, value){
		this.setState({
			name: value
		})
	}

	// Set the keyword value
	setSearchword(searchWord){
		this.setParameter('searchWord',searchWord);
	}

	// Set the screens value
	setScreens(value){
		this.setParameter('screens',value);
	}

	// Set the seats value
	setSeats(value){
		this.setParameter('seats',value);
	}

	// Set the age value
	setAge(value){
		this.setParameter('age',value);
	}

	// Fonction de recherche que tous les composants de la page principale utiliseront
	search(searchWord, screen, seats, age) {
		console.log("searching");
		// Vérifier qu'il y a qqch
	}

	printState(){
		console.log(this.state.cinemas);
	}

	// AJAX Call
	componentDidMount(){
		axios
			.get("http://localhost/web-imac-2018-dashboard/back/public/cinemas")
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
		return (
			<div className="App">
				<div className="searchDivs">
					<div className="map">

					</div>

					<div className="searchbar">
						<Searchbar search={this.search} setParentSearchword={this.setSearchword} />
					</div>

					<div className="screenFilter">

					</div>

					<div className="seatFilter">
						<Filterbyseat />
					</div>

					<div className="freqFilter">

					</div>

					<div className="artHouseFilter">

					</div>

					<button onClick={this.printState}>test ajax call</button>
				</div>


			</div>
		);
	}
}

export default App;
