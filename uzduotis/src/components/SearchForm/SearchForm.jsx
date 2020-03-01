import React from 'react';

const SearchForm = (props) => {
    return (
        <div>
            <form onSubmit={props.submit}>
                <div className="form-group row">
                    <label className="col-sm-2 col-form-label" htmlFor="title">Movie Title</label>
                    <input
                        type="text"
                        className="form-control col-sm-10"
                        id="title"
                        placeholder="Enter title"
                        autoComplete="off"
                        list="moviesFound"
                        onChange={props.inputChange}
                        value={props.inputValue}
                    />
                    <datalist id="moviesFound">
                        
                    </datalist>
                </div>
                <button type="submit" className="btn btn-primary">Search</button>
            </form>
        </div>
    );
}

export default SearchForm;


