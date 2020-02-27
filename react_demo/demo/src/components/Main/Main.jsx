import React from 'react';
import posts from '../../data/posts';
import './Main.scss';
import Article from '../Article/Article';
import Location from '../Location/Location';

class Main extends React.Component {
    constructor() {
        super();
        this.state = {
            places: []
        }
    }

    componentDidMount() {
        fetch("https://api.meteo.lt/v1/places")
        .then(res => res.json())
        .then(data => this.setState({places: data}));
    }

    render() {
        const locations = this.state.places.map((place, index) =>
           <Location
                key={index}
                location={place.name}
           />
        );
        return (
            <div>
                {locations}
            </div>
        );
    }
};

export default Main;
