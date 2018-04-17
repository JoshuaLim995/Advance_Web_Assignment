import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class User extends Component {

	constructor(props) {
		super(props);

		this.state = {
			fetched: false,
			user: null,
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
		.then(user => {
			this.setState({ fetched: true });
			this.setState({ user });
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
			<td>Name</td>
			<td >{ this.state.user.name }</td>
			</tr>
			<tr>
			<td>Email</td>
			<td className="table-text">{ this.state.user.email }</td>
			</tr>
			<tr>
			<td>Role</td>
			<td className="table-text">{ this.state.user.role }</td>
			</tr>
			<tr>
			<td>Created at</td>
			<td className="table-text">{ this.state.user.created_at }</td>
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
			if(this.state.fetched && this.state.user) {
				return this.renderTable();
			}
			else{
				return this.renderLoader();
			}
		}
	}

	(() => {
		var element = document.getElementById('user-show');
		if(__props && element) {
			ReactDOM.render(<User {...__props} />, element);
		}
	})();