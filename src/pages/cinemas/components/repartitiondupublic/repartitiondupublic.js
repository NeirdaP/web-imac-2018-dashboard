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

class RepartitionDuPublic extends Component {
	// CONSTRUTOR
	constructor(props) {
		super(props);

		this.state = {
			sexe: [42,58],
			age: [12,46,31,11]
		}
	}

	// RENDER THE COMPONENT
	render() {
		return (
      <div className="repartitiondupublic">
        <h3>Répartition du public</h3>
				<div className="caract">
					<h4>Sexe :</h4>
					<p>{this.state.sexe}</p>
					<h4>Âge :</h4>
					<p>{this.state.age}</p>
				</div>
      </div>
		);
	}
}

export default RepartitionDuPublic;
