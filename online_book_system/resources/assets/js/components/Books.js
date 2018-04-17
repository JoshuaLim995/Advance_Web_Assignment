import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Books extends Component {

	constructor(props) {
		super(props);

		this.state = {
			fetched: false,
			books: null,
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
		.then(books => {
			this.setState({ fetched: true });
			this.setState({ books });
		})
		.catch(error => alert(error));
	}

	renderHeadings() {
		return (
			<thead>
			<tr>
			<th>No.</th>
			<th>Title</th>
			<th>Author</th>
			<th>Action</th>
			</tr>
			</thead>
			);
		}

		renderBooks() {
			return this.state.books.map((book, i) => {
				return (
				<tr key={book.id}>
				<td>{ i + 1 }</td>
				<td>{book.title}</td>
				<td>{book.author}</td>
				<td>
				<a href={ ['book', book.id].join('/') }>
				<button class="btn">
				Show
				</button>
				</a>
				</td>
				</tr>				
				)
			});
		}

		renderTable() {
			return (
			<table className="table">
			{ this.renderHeadings() }
			<tbody>
			{ this.renderBooks() }
			</tbody>
			</table>
			);
		}



		renderLoader() {
			return (
			<div>
			Loading books...
			</div>
			);
		}

		renderEmpty() {
			return (
			<div>
			No records...
			</div>
			);
		}

		render() {
			if(this.state.fetched && this.state.books) {
				if(this.state.books.length) {
					return this.renderTable();
				}
				else{
					return this.renderEmpty();
				}
			}
			else {
				return this.renderLoader();
			}
		}
	}

	(() => {
		var element = document.getElementById('book-index');
		if(__props && element) {
			ReactDOM.render(<Books {...__props} />, element);
		}
	})();