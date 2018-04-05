import React, { Component } from 'react';
import './App.css';
import Test from './components/Test'
import axios from "axios"

class App extends Component {
  // INITIAL STATE
  state = {
    contacts: []
  };

  componentDidMount() {
    axios
      .get("https://jsonplaceholder.typicode.com/users")
      .then(response => {

        // create an array of contacts only with relevant data
        const newContacts = response.data.map(c => {
          return {
            id: c.id,
            name: c.name
          };
        });

        // create a new "State" object without mutating 
        // the original State object. 
        const newState = Object.assign({}, this.state, {
          contacts: newContacts
        });

        // store the new state object in the component's state
        this.setState(newState);
      })
      .catch(error => console.log(error));
  }

  // RENDER THE COMPONENT
  render() {
    return (
      <div className="Body">
        <div className="App">
            <h2>On adore ce que vous faites</h2>
        </div>
        {console.log(this.state.contacts)}
        <Test />
      </div>
    );
  }
}

export default App;
