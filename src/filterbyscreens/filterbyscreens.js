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

class Filterbyscreens extends Component {
	// CONSTRUTOR
	constructor(props) {
		super(props);

		this.state = {
			screens : {min: 1, max: 30}
		}
		this.updateInputValue = this.updateInputValue.bind(this);
		this.search = this.search.bind(this);
	}

	// UPDATE VALUES IN SLIDER INPUTS
	updateInputValue(e) {
		let minmaxscreens = {
			min: e.value[0],
			max: e.value[1]
		}
		this.setState({ screens: minmaxscreens })
	}

// UPDATE VALUES IN APP
	updateStateValue(e) {
		let minmaxscreens = {
			min: e.value[0],
			max: e.value[1]
		}

		this.props.setParentScreensSlider(minmaxscreens)
	}

	search(){
		this.props.search();
	}

	// RENDER THE COMPONENT
	render() {
		return (
      <div className="filter screens">
        <h2>Filter by screens</h2>
        <Range min={1} max={30} defaultValue={[1, 200]} pushable={15} onChange={ value => this.updateInputValue({value})} onAfterChange={ value => this.updateStateValue({value}) } />
        <div className="values">
          <input type="text" className="min-value" value={ this.state.screens.min } readOnly />
          <input type="text" className="max-value" value={ this.state.screens.max } readOnly />
        </div>
      </div>
		);
	}
}

export default Filterbyscreens;
