import React, { Component } from 'react';
import './resultlist.css';
import cross from '../../../../image/cross.png';

class ResultList extends Component {
	constructor(props){
		super(props);

		this.changeShowList = this.changeShowList.bind(this)
		this.changeShowCinema = this.changeShowCinema.bind(this)
	}

	changeShowList() {
		this.props.showResult();
	}

	changeShowCinema() {
		this.props.showCinema();
	}

	render() {
		return (
			<div className="resultList">

				<div className="resultTitle">
					<h2> RÉSULTATS </h2>
					<button onClick={this.changeShowList}><img src={cross} alt="closeButton"></img></button>
				</div>

				<div className="cinema">
					<ul>
						{this.props.cinemas.map((cinema) =>
							<li key={cinema} onClick={this.changeShowCinema} >
								<span className="nameCinema">{cinema.name}</span>
								<br></br>
								<span className="adresseCinema">{cinema.latitude} {cinema.longitude}</span>
							</li>
						)}
					</ul>
				</div>
			</div>
		);
	}
}

export default ResultList;
