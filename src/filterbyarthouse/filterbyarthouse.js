import React, { Component } from 'react';
import './filterbyarthouse.css';
import axios from "axios"

class Searchbar extends Component {
	// CONSTRUTOR
	constructor(props) {
		super(props);

		this.state = {
			artHouse: "2"
		}

		this.updateArtHouse = this.updateArtHouse.bind(this);
		this.handleChange = this.handleChange.bind(this);
		this.search = this.search.bind(this);
	}

	// UPDATE ART HOUSE IN APP
	updateArtHouse(e) {
		this.props.setParentArtHouse(e.target.value);
	}

	// UPDATE ART HOUSE STATE IN Component
	handleChange(event) {
	  this.setState({
	    artHouse: event.target.value
	  });
		this.updateArtHouse(event);
	}


	search(){
		this.props.search();
	}

	// RENDER THE COMPONENT
	render() {
		return (
			<div className="filter artHouse">
				<h2>Art house</h2>
				<ul>
				<li className="radio">
					<input type="radio" id="both" name="artHouse" value={"2"}
					checked={this.state.artHouse === "2"}
					onChange={ this.handleChange } /><label htmlFor="both">Both</label>
					<div className="check"></div>
				</li>
				<li className="radio">
					<input type="radio" id="except" name="artHouse" value={"1"} checked={this.state.artHouse === "1"}
					onChange={ this.handleChange } /><label htmlFor="except">Except</label>
					<div className="check">
						<div className="inside"></div>
					</div>
				</li>
				<li className="radio">
					<input type="radio" id="only" name="artHouse" value={"0"} checked={this.state.artHouse === "0"}
					onChange={ this.handleChange } /><label htmlFor="only">Only</label>
					<div className="check">
						<div className="inside"></div>
					</div>
				</li>
				</ul>
			</div>
		);
	}
}


/* onClick={ value => this.updateArtHouse({value})} */
export default Searchbar;
