import React, { Component } from 'react';
//import ReactDOM from 'react-dom';
// We can just import Slider or Range to reduce bundle size
// import Slider from 'rc-slider/lib/Slider';
// import Range from 'rc-slider/lib/Range';

/*ReactDOM.render(  <div>
    <Slider />
    <Range />
  </div>,
  container
);/**/

// IMAGES

class RepartitionDeLaProduction extends Component {
	// CONSTRUTOR
	constructor(props) {
		super(props);

		this.state = {
			realisateur: [30,70],
			acteur: [40,60]
		}
	}

	// RENDER THE COMPONENT
	render() {
		return (
			<div className="repartitiondelaproduction">
				<h3>Répartition de la production</h3>
			
				<div className="caract">
					<h4>Réalisateur.rice :</h4>
					<p>H/F {this.state.realisateur}</p>
					<h4>Acteur.rice :</h4>
					<p>H/F {this.state.acteur}</p>
				</div>
			
			</div>
		);
	}
}

export default RepartitionDeLaProduction;
