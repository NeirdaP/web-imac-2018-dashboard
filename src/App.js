import React, { Component } from 'react';
import './App.css';
import Searchbar from './searchbar/searchbar.js';

class App extends Component {
	state = {
		
	};
	render() {
		return (
			<div className="App">
				<h2>On adore ce que vous faites</h2>
				<Searchbar />
			</div>
		);
	}
}

export default App;
