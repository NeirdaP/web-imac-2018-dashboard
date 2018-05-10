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

		this.updateKeyword = this.updateKeyword.bind(this);
		this.search = this.search.bind(this);
	}

	// UPDATE KEYWORD IN APP
	updateKeyword(e) {
		this.props.setParentSearchword(e.target.value);
	}

	search(){
		this.props.search();
	}

	// RENDER THE COMPONENT
	render() {
		return (
      <div className="filterbyseat">
        <h2>Filter by seats</h2>
        <Range min={0} max={20} defaultValue={[3, 10]} pushable={1} tipFormatter={value => `${value}%`}/>
        <div className="values">
          <input type="text" className="min-value" value="Min" readOnly />
          <input type="text" className="max-value" value="Max" readOnly />
        </div>
      </div>
		);
	}
}

export default Filterbyseat;
