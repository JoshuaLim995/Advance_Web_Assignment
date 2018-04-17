import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Book extends Component {

	constructor(props) {
		super(props);

		this.state = {
			fetched: false,
			book: null,
		}
	}

	componentDidMount() {
		var url = this.props.url;

		fetch(url, {
			headers: {Accept: 'application/json'},
			credentials: 'same-origin',
		})
		.then(response => {
			if(response.ok) return response.json();
			else throw Error([response.status, response.statusText].join(''));
		})
		.then(book => {
			this.setState({ fetched: true });
			this.setState({ book });
		})
		.catch(error => alert(error));
	}

		renderHeading() {
			return (
			<thead>
			<tr>
			<th>Attribute</th>
			<th>Value</th>
			</tr>
			</thead>
			)
		}

		renderTable() {
			return (
			<table className="table table-stripped">
			{ this.renderHeading() }
			<tbody>
			<tr>
			<td>ISBN</td>
			<td >{ this.state.book.isbn }</td>
			</tr>
			<tr>
			<td>Title</td>
			<td className="table-text">{ this.state.book.title }</td>
			</tr>
			<tr>
			<td>Synopsis</td>
			<td className="table-text">{ this.state.book.synopsis }</td>
			</tr>
			<tr>
			<td>Author</td>
			<td className="table-text">{ this.state.book.author }</td>
			</tr>
			<tr>
			<td>Edition</td>
			<td className="table-text">{ this.state.book.edition }</td>
			</tr>
			<tr>
			<td>Year</td>
			<td className="table-text">{ this.state.book.edition_year }</td>
			</tr>
			<tr>
			<td>Category</td>
			<td className="table-text">
			{ this.state.book.category }
			</td>
			</tr>
			</tbody>
			</table>
			);
		}




		renderLoader() {
			return (
			<div>
			Loading data...
			</div>
			);
		}

		render(){
			if(this.state.fetched && this.state.book) {
				return this.renderTable();
			}
			else{
				return this.renderLoader();
			}
		}
	}

	(() => {
		var element = document.getElementById('book-show');
		if(__props && element) {
			ReactDOM.render(<Book {...__props} />, element);
		}
	})();