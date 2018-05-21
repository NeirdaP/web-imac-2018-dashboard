import React, { Component } from 'react';

// COMPONENTS TO IMPORT
import Adresse from './components/adresse/adresse.js';
import Sieges from './components/sieges/sieges.js';
import Ecrans from './components/ecrans/ecrans.js';
import RepartitionDuPublic from './components/repartitiondupublic/repartitiondupublic.js';
import RepartitionDeLaProduction from './components/repartitiondelaproduction/repartitiondelaproduction.js';
import CaracteristiquesDesFilmsDiffuses from './components/caracteristiquesdesfilmsdiffuses/caracteristiquesdesfilmsdiffuses.js';


// STYLE OF THE COMPONENT
import './cinemas.css';

//IMAGES
import cross from '../../image/cross.png';

// AXIOS FOR THE API CALL
//import axios from "axios";

class Cinemas extends Component {

	// CONSTRUCTOR
	constructor(props) {
		super(props);

		this.changeShowList = this.changeShowList.bind(this);
	}

	changeShowList() {
		this.props.showResult();
	}

	// RENDER THE COMPONENT
	render() {
		return (
			<div className="component Cinema">
				<div className="cinemaTitle">
					<h2>{this.props.cinemas[2].name}</h2>
					<button onClick={this.changeShowList}><img src={cross} alt="closeButton"></img></button>
				</div>

				<div className="cineInfo">
					<div className="adresse">
						<Adresse />
					</div>

					<div className="ecrans">
						<Ecrans />
					</div>

					<div className="sieges">
						<Sieges />
					</div>

					<div className="repartitiondupublic">
						<RepartitionDuPublic />
					</div>

					<div className="repartitiondelaproduction">
						<RepartitionDeLaProduction />
					</div>

					<div className="caracteristiquesfilmsdiffuses">
						<CaracteristiquesDesFilmsDiffuses />
					</div>
				</div>
			</div>
		);
	}
}

export default Cinemas;
