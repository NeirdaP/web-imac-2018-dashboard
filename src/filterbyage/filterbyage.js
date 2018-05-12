import React, { Component } from 'react';
//import ReactDOM from 'react-dom';
import { Range } from 'rc-slider';
// We can just import Slider or Range to reduce bundle size
// import Slider from 'rc-slider/lib/Slider';
// import Range from 'rc-slider/lib/Range';
import 'rc-slider/assets/index.css';

/*ReactDOM.render(  <div>
    <Slider />
    <Range />
  </div>,
  container
);/**/

class Filterbyage extends Component {
	// CONSTRUTOR
	constructor(props) {
		super(props);

		this.state = {
			age : {min: 1, max: 99}
		}
		this.updateInputValue = this.updateInputValue.bind(this);
		this.search = this.search.bind(this);
	}

	// UPDATE VALUES IN SLIDER INPUTS
	updateInputValue(e) {
		let minmaxage = {
			min: e.value[0],
			max: e.value[1]
		}
		this.setState({ age: minmaxage })
	}

// UPDATE VALUES IN APP
	updateStateValue(e) {
		let minmaxage = {
			min: e.value[0],
			max: e.value[1]
		}

		this.props.setParentAgeSlider(minmaxage)
	}

	search(){
		this.props.search();
	}

	// RENDER THE COMPONENT
	render() {
		return (
      <div className="filter age">
        <h2>Filter by age</h2>
        <Range min={1} max={99} defaultValue={[this.state.age.min, this.state.age.max]} pushable={1} onChange={ value => this.updateInputValue({value})} onAfterChange={ value => this.updateStateValue({value}) } />
        <div className="values">
          <input type="text" name="agemin" className="min-value" value={ this.state.age.min } readOnly />
          <input type="text" name="agemax" className="max-value" value={ this.state.age.max } readOnly />
        </div>
      </div>
		);
	}
}

export default Filterbyage;
