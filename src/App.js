import React, { Component } from 'react';
import { Route, Switch } from 'react-router-dom';

import './App.scss';
import Home from './pages/home/home';

class App extends Component {
	/*constructor (props) {
		super(props);
	}*/
	
	render() {
		return (
			<main>
				<Switch>
        			<Route path='/' component={Home}/>
				</Switch>
			</main>
		)
	}
}

export default App;
