import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Users extends Component {

	constructor(props){
		super(props);

		this.state = {
			fetched: false,
			users: null,
		}
	}

	componentDidMount() {
		var url = this.props.url;

		fetch(url, {
			headers: { Accept: 'application/json' },
			credentials: 'same-origin',
		})
		.then(response => {
			if(response.ok) return response.json();
			else throw Error([response.status, response.statusText].join(''));
		})
		.then(users => {
			this.setState({ fetched: true });
			this.setState({ users });
		})
		.catch(error => alert(error));
	}

	renderHeadings() {
		return (
			<thead>
			<tr>
			<th>No.</th>
			<th>Name</th>
			<th>Email</th>
			<th>Actions</th>
			</tr>
			</thead>
			);
	}

	renderUsers() {
		return this.state.users.map((user, i) => {
			return (
				<tr>
				<td>{ i + 1 }</td>
				<td>{ user.name }</td>
				<td>{ user.email }</td>
				<td>
				<a href={ ['user', user.id].join('/') }>
				<button class="btn">
				Show
				</button>
				</a>
				<a href={ ['user', user.id, 'edit'].join('/') }>
				<button class="btn btn-primary">
				Edit
				</button>
				</a>	
				<a href={ ['user', user.id, 'delete'].join('/') }>
				<button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
				Delete
				</button>
				</a>
				</td>
				</tr>
				);
			});
		}

		renderTable() {
			return (
			<table className="table">
			{ this.renderHeadings() }
			<tbody>
			{ this.renderUsers() }
			</tbody>
			</table>
			);
		}

		renderEmpty() {
			return (
			<div>
			No records found
			</div>
			);
		}

		renderLoader() {
			return (
			<div>
			Loading users...
			</div>
			)
		}

		render() {
			if(this.state.fetched && this.state.users){
				if(this.state.users.length) {
					return this.renderTable();
				}
				else {
					return this.renderEmpty();
				}
			}
			else {
				return this.renderLoader();
			}
		}
	}

	(() => {
		var element = document.getElementById('user-index');
		if(__props && element) {
			ReactDOM.render(<Users {...__props} />, element);
		}
	})();