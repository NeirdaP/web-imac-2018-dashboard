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

class CaracteristiquesDesFilmsDiffuses extends Component {
	// CONSTRUTOR
	constructor(props) {
		super(props);

		this.state = {
			nb: [48,52],
			nationalite: "française",
			genre: 3
		}
	}

	// RENDER THE COMPONENT
	render() {
		return (
      <div className="caracteristiquesfilmsdiffuses">
        <h3>Caractéristiques des films diffusés</h3>
				<div className="caract">
					<h4>Colorimetrie :</h4>
					<p>N/B {this.state.nb}</p>
				</div>
				<div className="caract">
					<h4>Nationalité :</h4>
					<p>{this.state.nationalite}</p>
				</div>
				<div className="caract">
					<h4>Genre :</h4>
					<p>{this.state.genre}</p>
				</div>
      </div>
		);
	}
}

export default CaracteristiquesDesFilmsDiffuses;
