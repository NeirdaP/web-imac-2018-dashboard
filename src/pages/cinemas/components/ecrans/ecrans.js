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
import screenIcon from '../../../../image/screen_icon.png';

class Ecrans extends Component {
	// CONSTRUTOR
	constructor(props) {
		super(props);
		
		this.state = {
			screens: 7
		}
	}

	// RENDER THE COMPONENT
	render() {
		return (
			<div className="ecrans">
				<h3>Ecrans</h3>
				<div className="icon ecranimg" ><img src={screenIcon} alt="screenIconImg" /> </div>
				<p>{this.state.screens}</p>
			</div>
		);
	}
}

export default Ecrans;
