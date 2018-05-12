import React, { Component } from 'react';
//import ReactDOM from 'react-dom';
import { Range } from 'rc-slider';
// We can just import Slider or Range to reduce bundle size
// import Slider from 'rc-slider/lib/Slider';
// import Range from 'rc-slider/lib/Range';
import 'rc-slider/assets/index.css';
import './filterbyseat.css';

/*ReactDOM.render(  <div>
    <Slider />
    <Range />
  </div>,
  container
);/**/

class Filterbyseat extends Component {
	// CONSTRUTOR
	constructor(props) {
		super(props);

		this.state = {
			seats : {min: 1, max: 200}
		}
		this.updateInputValue = this.updateInputValue.bind(this);
		this.search = this.search.bind(this);
	}

	// UPDATE VALUES IN SLIDER INPUTS
	updateInputValue(e) {
		let minmaxseats = {
			min: e.value[0],
			max: e.value[1]
		}
		this.setState({ seats: minmaxseats })
	}

// UPDATE VALUES IN APP
	updateStateValue(e) {
		//let min = ReactDOM.findDOMNode(".filterbyseat .min-value");
		//let max = ReactDOM.findDOMNode(".filterbyseat .max-value");
		let minmaxseats = {
			min: e.value[0],
			max: e.value[1]
		}

		this.props.setParentSeatsSlider(minmaxseats)
	}

	search(){
		this.props.search();
	}

	// RENDER THE COMPONENT
	render() {
		return (
      <div className="filterbyseat">
        <h2>Filter by seats</h2>
        <Range min={1} max={200} defaultValue={[1, 200]} pushable={15} onChange={ value => this.updateInputValue({value})} onAfterChange={ value => this.updateStateValue({value}) } />
        <div className="values">
          <input type="text" className="min-value" value={ this.state.seats.min/**/ } readOnly />
          <input type="text" className="max-value" value={ this.state.seats.max/**/ } readOnly />
        </div>
      </div>
		);
	}
}

export default Filterbyseat;
