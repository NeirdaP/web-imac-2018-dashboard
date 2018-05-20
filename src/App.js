import React, { Component } from 'react';

import {
  Route,
  NavLink,
  HashRouter
} from "react-router-dom";

import './App.scss';
import Home from './pages/home/home';

class App extends Component {
	/*constructor (props) {
		super(props);
	}*/
	
	render() {
		return (
			<HashRouter>
				<div>
   					<Route exact path="/" component={Home}/>
				</div>
			</HashRouter>
		)
	}
}

export default App;
