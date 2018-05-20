import React, { Component } from 'react';
import ReactDOM from 'react-dom'
import snazzyMapsConfig from './snazzyMaps.json'


export default class MapContainer extends Component {
	constructor(props){
		super(props);
		
		this.state = {
			cinemas: [],
			markers: []
		}
		
		this.removeMarkers = this.removeMarkers.bind(this);
		this.addMarker = this.addMarker.bind(this);
		this.addMarkers = this.addMarkers.bind(this);
		this.loadMap = this.loadMap.bind(this);
		this.setCinemas = this.setCinemas.bind(this);
	}
	
	
  componentDidMount() {
    this.loadMap(); // call loadMap function to load the google map
    this.addMarkers();

  }

	componentDidUpdate(prevProps, prevState) { // check if the map needs updating by checking the previous props with the current props
		if (prevProps.google !== this.props.google || prevProps.quakes !== this.props.quakes) {
		  this.loadMap();
		}
	}
	
	setCinemas(cinemas) {
		this.setState({cinemas: cinemas});
	}

	addMarker(cinema){
		const {google} = this.props; // sets props equal to google
		
		let markers = this.state.markers;
		
		markers.push(new google.maps.Marker({
		  position: {lat: cinema.latitude, lng: cinema.longitude},
		  map: this.map,
		  title: cinema.name
		}));
		
		// Créé un évent pop-up quand
		
		this.setState(Object.assign({}, this.state, {
			markers: markers
		}));
	}

	addMarkers(){		
		this.removeMarkers();
		
		this.state.cinemas.forEach( (c) => {
		  this.addMarker(c)
		});
	}
	
	removeMarkers() {
		this.state.markers.forEach((marker) => {
			marker.setMap(null);
		});
		
		this.setState(Object.assign({}, this.state, {
			markers: []
		}));
	}

	// LOAD THE GOOGLE MAP
	loadMap() {
		if (this.props && this.props.google) { // checks to make sure that props have been passed
			const {google} = this.props; // sets props equal to google
			const maps = google.maps; // sets maps to google maps props

			const mapRef = this.refs.map; // looks for HTML div ref 'map'. Returned in render below.
			const node = ReactDOM.findDOMNode(mapRef); // finds the 'map' div in the React DOM, names it node

			const mapConfig = Object.assign({}, {
				center: {lat: 48.8605365, lng: 2.2919761}, // sets center of google map to Paris.
				zoom: 13, // sets zoom. Lower numbers are zoomed further out.
				mapTypeId: 'roadmap', // optional main map layer. Terrain, satellite, hybrid or roadmap--if unspecified, defaults to roadmap.
				styles: snazzyMapsConfig
			})

			this.map = new maps.Map(node, mapConfig); // creates a new Google map on the specified node (ref='map') with the specified configuration set above.
		}
	}

	// RENDER THE COMPONENT
	render(){
	
		const style = { // MUST specify dimensions of the Google map or it will not work. Also works best when style is specified inside the render function and created as an object
		  width: '100vw',
		  height: '100vh'
		}

		return ( // in our return function you must return a div with ref='map' and style.
			<div ref="map" style={style}>
				loading map...
			</div>
		)
	}
}
