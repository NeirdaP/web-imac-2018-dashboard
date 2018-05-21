import React, { Component } from 'react';
//import ReactDOM from 'react-dom';

// IMAGES
import seatIcon from '../../../../image/seat_icon.png';

// SLIDER
// We can just import Slider or Range to reduce bundle size
// import Slider from 'rc-slider/lib/Slider';
// import Range from 'rc-slider/lib/Range';

/*ReactDOM.render(  <div>
    <Slider />
    <Range />
  </div>,
  container
);/**/


class Sieges extends Component {
	
	// CONSTRUTOR
	constructor(props) {
		super(props);
		
				
		this.state = {
			seats: 7
		}
	}

	// RENDER THE COMPONENT
	render() {
		return (
			<div className="sieges">
				<h3>Sièges</h3>
				<div className="icon siegeimg"><img src={seatIcon} alt="seatIconImg" /></div>
				<p>{this.state.seats}</p>
			</div>
		);
	}
}

export default Sieges;
