import React, { Component } from 'react';
import './searchbar.css';
import searchIcon from './img/searchIcon.png';

class Searchbar extends Component {
	constructor(props) {
		super(props);
		this.state = {};
		
		this.search = this.search.bind(this);
	}

	search(e){
		console.log(e.target.value + "click!");
		// Tester la valeur de l'input avant de la faire : si vide 
		// Faire requête en AJAX pour récuperer les résultats
	}
	
	render(){
		return (
			<div className="searchDiv">
				<input placeholder="Find a movie theater..." type="text" onKeyUp={this.search} />
				<button onClick={this.search}><img src={searchIcon} width="25px" alt="searchImg"/></button>
				
			</div>
		);
	}
	
}

export default Searchbar;
