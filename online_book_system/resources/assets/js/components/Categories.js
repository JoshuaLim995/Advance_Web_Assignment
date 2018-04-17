import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Categories extends Component {

	constructor(props) {
		super(props);

		this.state = {
			fetched: false,
			categories: null,
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
		.then(categories => {
			this.setState({ fetched: true });
			this.setState({ categories });
		})
		.catch(error => alert(error));
	}

	renderHeadings() {
		return (
			<thead>
			<tr>
			<th>No.</th>
			<th>Name</th>
			<th>Action</th>
			</tr>
			</thead>
			);
		}

		renderBooks() {
			return this.state.categories.map((category, i) => {
				return (
				<tr key={category.id}>
				<td>{ i + 1 }</td>
				<td>{category.name}</td>
				<td>
				<a href={ ['category', category.id].join('/') }>
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
			<table className="table table-stripped">
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
			Loading categories...
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
			if(this.state.fetched && this.state.categories) {
				if(this.state.categories.length) {
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
		var element = document.getElementById('category-index');
		if(__props && element) {
			ReactDOM.render(<Categories {...__props} />, element);
		}
	})();