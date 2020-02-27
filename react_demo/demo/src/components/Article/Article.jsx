import React from 'react';

class Article extends React.Component{
    constructor() {
        super();
        this.state = {
            counter: 0
        };
        this.handleClick = this.handleClick.bind(this);
    }

    handleClick() {
        this.setState(prevState => ({counter: prevState.counter + 1}));
    }

    render() {
        const {url, title, body} = this.props;
        return (
            <div className="col-12 col-md-6 col-lg-4 mb-3">
                <div className="card mx-0">
                    <img className="card-img-top" src={url} alt="Card image cap"/>
                    <div className="card-body">
                        <h5 className="card-title">{title}</h5>
                        <p className="card-text">{body}</p>
                        <p className="card-text">{this.state.counter}</p>
                        <a href="#" onClick={this.handleClick} className="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        )
    }
};

export default Article;