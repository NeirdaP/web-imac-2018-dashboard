import React, { Component } from 'react';
import './filterbyarthouse.css';

class Searchbar extends Component {
	// CONSTRUTOR
	constructor(props) {
		super(props);

		this.updateArtHouse = this.updateArtHouse.bind(this);
		this.search = this.search.bind(this);
	}

	// UPDATE ART HOUSE IN APP
	updateArtHouse(e) {
		this.props.setParentArtHouse(e);
	}

	search(){
		this.props.search();
	}

	// RENDER THE COMPONENT
	render() {
		return (
			<div className="filter artHouse">
				<h2>Art house</h2>
				<p className="radio">
					<input type="radio" id="both" name="artHouse" value={2} onClick={ value => this.updateArtHouse({value})} /><label htmlFor="both">Except</label>
				</p>
				<p className="radio">
					<input type="radio" id="except" name="artHouse" value={1} onClick={ value => this.updateArtHouse({value})} /><label htmlFor="except">Except</label>
				</p>
				<p className="radio">
					<input type="radio" id="only" name="artHouse" value={0} onClick={ value => this.updateArtHouse({value})} /><label htmlFor="only">Only</label>
				</p>
			</div>
		);
	}
}

export default Searchbar;
