import React, { Component } from 'react';
import './App.css';
import Searchbar from '../searchbar/searchbar.js';
import axios from "axios";

class App extends Component {

	// CONSTRUCTOR
	constructor(props) {
		super(props);
		
		this.state = {
			cinema: {},
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
		
	}
	
	// AJAX Call
	/*componnetDidMount(){
		axios
			.get()
			.then(response => {
				const newDatas = response.data.map(search => {
					return 0;
				})
			
				
				const newState = Object.assign({}, this.state, {
				});
			
				this.setState(newState);
			});
			.catch(error => console.log(error));
	}*/
	
	// RENDER THE COMPONENT
	render() {
		return (
			<div className="App">
				<Searchbar search={this.search} setParentSearchword={this.setSearchword} />
			</div>
		);
	}
}

export default App;
