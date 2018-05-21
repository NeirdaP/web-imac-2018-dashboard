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
//import siege from '../../../../image/seat_icon.png';

class Sieges extends Component {
	// CONSTRUTOR
	constructor(props) {
		super(props);
	}

	// RENDER THE COMPONENT
	render() {
		return (
      <div className="sieges">
        <h3>Sièges</h3>
				<div className="icon siegeimg"> </div>
				<p>140</p>
      </div>
		);
	}
}

export default Sieges;
