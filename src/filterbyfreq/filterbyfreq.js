import React, { Component } from 'react';
//import ReactDOM from 'react-dom';
import { Range } from 'rc-slider';
// We can just import Slider or Range to reduce bundle size
// import Slider from 'rc-slider/lib/Slider';
// import Range from 'rc-slider/lib/Range';
import 'rc-slider/assets/index.css';
import axios from "axios"

/*ReactDOM.render(  <div>
    <Slider />
    <Range />
  </div>,
  container
);/**/

class Filterbyfreq extends Component {
	// CONSTRUTOR
	constructor(props) {
		super(props);

		this.state = {
			freq: {min: 0, max: 10000}
		}
		this.updateInputValue = this.updateInputValue.bind(this);
		this.search = this.search.bind(this);
	}

	// UPDATE VALUES IN SLIDER INPUTS
	updateInputValue(e) {
		let minmaxfreq = {
			min: e.value[0],
			max: e.value[1]
		}
		this.setState({ freq: minmaxfreq })
	}

// UPDATE VALUES IN APP
	updateStateValue(e) {
		let minmaxfreq = {
			min: e.value[0],
			max: e.value[1]
		}

		this.props.setParentFreqSlider(minmaxfreq)
	}

	search(){
		this.props.search();
	}

	// AJAX Call pour récupérer les valeurs par défaut min/max du slider
/*	componentDidMount(){
		axios
			.get("http://localhost/web-imac-2018-dashboard/back/public/freq")
			.then(response => {
				console.log(response);
				const newFreq = response.data.map(c => {
					return {
					min: c.min,
					max: c.max
					};
				});

				// create a new "State" object without mutating the original State object.
				const newState = Object.assign({}, this.state, {
					freq: newFreq
				});

				// store the new state object in the component's state
				this.setState(newState);
			})
			.catch(error => console.log(error));
	}*/

	// RENDER THE COMPONENT
	render() {
		return (
      <div className="filter freq">
        <h2>Filter by year frequentation</h2>
        <Range min={0} max={10000} defaultValue={[this.state.freq.min,this.state.freq.max]} pushable={200} step={50} onChange={ value => this.updateInputValue({value})} onAfterChange={ value => this.updateStateValue({value}) } />
        <div className="values">
          <input type="text" name="freqmin" className="min-value" value={ this.state.freq.min } readOnly />
          <input type="text" name="freqmax" className="max-value" value={ this.state.freq.max } readOnly />
        </div>
      </div>
		);
	}
}

export default Filterbyfreq;
