import React from 'react';
import './App.css';
import TodosTable from '../TodosTable/TodosTable';

class App extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      todos: []
    };

    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleSubmit(e) {
    e.preventDefault();
      fetch("http://todo.test/api/all-todos")
      .then(res => res.json())
      .then(data => {
          console.log(data);
        this.setState({todos: data});
      });
  }

  render() {
      return (
          <div className="App">
              <form onSubmit={this.handleSubmit}>
                  <button type="submit">Get Todos</button>
              </form>
              <TodosTable todos = {this.state.todos}/>
          </div>
      );
  }
}

export default App;
