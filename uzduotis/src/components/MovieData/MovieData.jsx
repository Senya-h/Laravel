import React from 'react';

function MovieData({title, description, imdb, length, director}) {
    return (
        <div className="mt-3 table-responsive">
            <table className="table">
                <tbody>
                <tr>
                    <th scope="row" className="bg-dark text-light">Title</th>
                    <td>{title}</td>
                </tr>
                <tr>
                    <th scope="row" className="bg-dark text-light">Description</th>
                    <td>{description}</td>
                </tr>
                <tr>
                    <th scope="row" className="bg-dark text-light">IMDB</th>
                    <td>{imdb}</td>
                </tr>
                <tr>
                    <th scope="row" className="bg-dark text-light">Length</th>
                    <td>{length}</td>
                </tr>
                <tr>
                    <th scope="row" className="bg-dark text-light">Director</th>
                    <td>{director}</td>
                </tr>
                </tbody>
                
            </table>
        </div>
    );
}

export default MovieData;
