import React from 'react';
import Modal from "react-bootstrap/Modal";

class TodosTable extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            open: false,
            subject: '',
            dueDate: '',
            percent: '',
            priority: '',
            status: '',
            updatedAt: '',
        };

        this.openModalWithTodo = this.openModalWithTodo.bind(this);
        this.handleHide = this.handleHide.bind(this);
    }

    openModalWithTodo(todo) {
        this.setState({
            open: true,
            subject: todo.subject,
            dueDate: todo.dueDate,
            percent: todo.percent,
            priority: todo.priorityName,
            status: todo.statusName,
            updatedAt: todo.updated_at,
        })
    }

    handleHide() {
        this.setState({open: false});
    }

    render() {
        const todosTitles = this.props.todos.map((todo, index) => (
            <a className="d-block" key={index} href="#" onClick={() => this.openModalWithTodo(todo)}>{todo.subject}</a>
        ));
        return (
            <div>
                {todosTitles}

                <Modal show={this.state.open} onHide={this.handleHide}>
                    <Modal.Header closeButton>
                        <Modal.Title>{this.state.subject}</Modal.Title>
                    </Modal.Header>
                    <Modal.Body>
                        <ul>
                            <li><span>Due Date: </span>{this.state.dueDate}</li>
                            <li><span>Percent: </span>{this.state.percent}</li>
                            <li><span>Priority: </span>{this.state.priority}</li>
                            <li><span>Status </span>{this.state.statusName}</li>
                            <li><span>Updated at: </span>{this.state.updatedAt}</li>
                        </ul>

                    </Modal.Body>
                </Modal>
            </div>
        )
    }
}

export default TodosTable;