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

class Adresse extends Component {
	// CONSTRUTOR
	constructor(props) {
		super(props);

		this.state = {
			adresse : "8 Adresse de test, 75020 Paris"
		}
	}

	// RENDER THE COMPONENT
	render() {
		return (
      <div className="adresse">
        <h3>Adresse</h3>
				<p>{this.state.adresse}</p>
      </div>
		);
	}
}

export default Adresse;
