import React, { Component } from 'react';

// COMPONENTS TO IMPORT
import Searchbar from './components/searchbar/searchbar.js';
import Filterbyseat from './components/filterbyseat/filterbyseat.js';
import Filterbyscreens from './components/filterbyscreens/filterbyscreens.js';
import Filterbyage from './components/filterbyage/filterbyage.js';
import Filterbyfreq from './components/filterbyfreq/filterbyfreq.js';
import Filterbyarthouse from './components/filterbyarthouse/filterbyarthouse.js';
import Cinemas from '../cinemas/cinemas.js';
import ResultList from './components/resultpage/resultlist';
//import Cinemas from '../cinemas/cinemas.js';

// STYLE OF THE COMPONENT
import './home.css';

// AXIOS FOR THE API CALL
import axios from "axios";

// IMAGES
import addMovie from '../../image/addMovie.png';

class Home extends Component {

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
			showResultList: false,
			showCinemaValue: false
		}

		this.setParameters = this.setParameter.bind(this);
		this.setSearchword = this.setSearchword.bind(this);
		this.setScreens = this.setScreens.bind(this);
		this.setSeats = this.setSeats.bind(this);
		this.setAge = this.setAge.bind(this);
		this.setFreq = this.setFreq.bind(this);
		this.setArtHouse = this.setArtHouse.bind(this);
		this.search = this.search.bind(this);
		this.showResult = this.showResult.bind(this);
		this.showCinema = this.showCinema.bind(this);
		this.addMovie = this.addMovie.bind(this);
		this.componentDidMount = this.componentDidMount.bind(this);
	}

	//SETTERS
	setParameter(name, value){
		switch(name){
			case 'age':
				this.setState({
					age: value
				});
				break;
			case 'artHouse':
				this.setState({
					artHouse: value
				});
				break;
			case 'freq':
				this.setState({
					freq: value
				});
				break;
			case 'screens':
				this.setState({
					screens: value
				});
				break;
			case 'seats':
				this.setState({
					seats: value
				});
				break;
			case 'searchWord':
				this.setState({
					searchWord: value
				});
				break;
			default:
				console.log('Erreur: switch default in setParameter(name, value).');
				this.setState({
					name: value
				});
				break;
		}
		console.log(this.state)
	}

	// SETTERS
	setSearchword(searchWord){
		this.setParameter('searchWord', searchWord);
	}

	setScreens(value){
		this.setParameter('screens', value);
	}

	setSeats(value){
		this.setParameter('seats', value);
	}

	setArtHouse(value){
		this.setParameter('artHouse', value);
	}

	setAge(value){
		this.setParameter('age', value);
	}

	setFreq(value){
		this.setParameter('freq', value);
	}

	// SEARCH FUNCTION FOR ALL SEARCHING FILTER
	search(searchWord, screens, seats, age) {


		console.log("Searching thanks to the AXIOS call in our API");
		this.setState({showResultList: true});
	}

	// SHOW THE LIST OF RESULT
	showResult(){
		this.setState({showResultList: false, showCinemaValue: false});
	}

	// SHOW THE Cinema
	showCinema(){
		this.setState({showResultList: false, showCinemaValue: 2});
	}

	// ADD A MOVIE TO THE APP
	addMovie(){
		console.log("Here should be the call for the creation of a movie");
	}

	// AJAX Call
	componentDidMount(){
		axios
			.get("http://back.cinema-parisiens.fr/cinemas")
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

	renderInterface(){
		if(this.state.showCinemaValue !== false){
			return (
				<Cinemas showResult={this.showResult} cinemas={this.state.cinemas} />
			);
		}
		else if (this.state.showResultList){
			return (
				<ResultList showResult={this.showResult} showCinema={this.showCinema} cinemas={this.state.cinemas} />
			);
		}
		else {
			return (
				<div className="searchDivs">
					<div className="component screenFilter" >
						<Filterbyscreens onAfterChange={this.search} setParentScreensSlider={this.setScreens} />
					</div>

					<div className="component seatFilter">
						<Filterbyseat onAfterChange={this.search} setParentSeatsSlider={this.setSeats} />
					</div>

					<div className="component ageFilter">
						<Filterbyage onAfterChange={this.search} setParentAgeSlider={this.setAge} />
					</div>

					<div className="component freqFilter">
						<Filterbyfreq onAfterChange={this.search} setParentFreqSlider={this.setFreq} />
					</div>

					<div className="component artHouseFilter">
						<Filterbyarthouse onAfterChange={this.search} setParentArtHouse={this.setArtHouse} />
					</div>
				</div>
			);
		}
	}

	// RENDER THE COMPONENT
	render() {
		const showResultList = this.state.showResultList;
		const showCinema = this.state.showCinemaValue;

		// TO SHOW THE LIST OR THE SEARCH FILTERS OR THe CINEMA PAGE
		const resultList = this.renderInterface();


		return (
			<div className="Home">
					<div className="component searchbar">
						<Searchbar search={this.search} setParentSearchword={this.setSearchword} />
					</div>

					{resultList}

					<button className="addMovieButton" onClick={this.addMovie}><img src={addMovie} alt="addMovie"></img></button>
			</div>
		);
	}
}

export default Home;
