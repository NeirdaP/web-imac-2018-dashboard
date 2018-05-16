import React, { Component } from 'react';
import './searchbar.css';
import searchIcon from '../image/searchIcon.png';

class Searchbar extends Component {
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
			<div className="searchDiv">
				<input placeholder="Find a movie theater..." type="text" onKeyUp={this.updateKeyword} />
				<button onClick={this.search}><img src={searchIcon} width="20px" alt="searchImg"/></button>
			</div>
		);
	}
}

export default Searchbar;
