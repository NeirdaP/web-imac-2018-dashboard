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
			siege: 140
		}
	}

	// RENDER THE COMPONENT
	render() {
		return (
      <div className="caracteristiquesfilmsdiffuses">
        <h3>Caractéristiques des films diffusés</h3>
				<p>{this.siege}</p>
      </div>
		);
	}
}

export default CaracteristiquesDesFilmsDiffuses;
