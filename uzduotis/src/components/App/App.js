import React from 'react';
import SearchForm from '../SearchForm/SearchForm';
import MovieData from '../MovieData/MovieData';
import './App.scss';

class App extends React.Component {

  apiUrl = 'https://www.omdbapi.com/?apikey=e4db3ced&t=';

  state = {
    inputTitle: '',
    movieData: '',
    error: ''
  }

  handleInputChange = (event) => {
    this.setState({inputTitle: event.target.value});
  }

  handleSubmit = async (event) => {
    event.preventDefault();

    if(!this.state.inputTitle.trim()) { //empty input
      this.setState({movieData: '', error: 'Please enter a title!'})
      return;
    }

    const movieData = await fetch(this.apiUrl + this.state.inputTitle.trim())
    .then(res => res.json());
    
    if(movieData.Error) {
      this.setState({movieData: '', error: "Movie not found!"})
    } else {
      this.setState({movieData: movieData, error: ''})
    }
}

  render() {
    let result = null;
    if(this.state.movieData) { //Movie was found
      result = (
        <MovieData
          title={this.state.movieData.Title}
          description={this.state.movieData.Plot}
          imdb={this.state.movieData.imdbRating}
          length={this.state.movieData.Runtime}
          director={this.state.movieData.Director}
        />
      )
    } else if(this.state.error) { //Movie was not found
      result = (
        <h3>{this.state.error}</h3>
      )
    }
    return (
      <div className="container">
        <h2>Movie Search App</h2>
        <SearchForm
          inputChange={this.handleInputChange}
          inputValue={this.state.inputTitle}
          submit={this.handleSubmit}
        />
      
        {result}
      </div>
    );
  }
}

export default App;
