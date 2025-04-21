import React from "react";
import ReactDOM from "react-dom/client";
import Input from "./components/Input";
import LoginForm from "./components/LoginForm";
import UserList from "./components/UserList";
import UserCardList from "./components/UserCardList";
import Button from "./components/Button";
import Footer from "./components/Footer";
import Header from "./components/Header";
import UserCard from "./components/UserCard";
import DropdownAcoes from "./components/DropdownAcoes";

import "./bootstrap";
import { createRoot } from "react-dom/client";
import { Smiley, Heart, Horse } from "@phosphor-icons/react";

import "../css/app.css";

//monta o header
const header = document.getElementById("react-header");
if (header) {
    const props = JSON.parse(header.dataset.props);
    createRoot(header).render(<Header {...props} />);
}

// Monta o input React
function mountInput(id) {
    const el = document.getElementById(id);
    if (el) {
        const parsedProps = JSON.parse(el.getAttribute("data-props"));
        ReactDOM.createRoot(el).render(<Input {...parsedProps} />);
    }
}

// Renderiza todos os dropdowns
document.querySelectorAll('[id^="dropdown-acoes-"]').forEach((el) => {
    const props = JSON.parse(el.getAttribute("data-props"));
    ReactDOM.render(<DropdownAcoes {...props} />, el);
});

// Monta o formulário
function mountForm(id) {
    const el = document.getElementById(id);
    if (el) {
        ReactDOM.createRoot(el).render(<LoginForm />);
    }
}
// monta o botão react

function mountButton(id) {
    const el = document.getElementById(id);
    if (el) {
        const parsedProps = JSON.parse(el.getAttribute("data-props"));
        ReactDOM.createRoot(el).render(<Button {...parsedProps} />);
    }
}
//monta user card
function mountUserCard(id) {
    const el = document.getElementById(id);
    if (el) {
        const props = JSON.parse(el.getAttribute("data-props"));
        ReactDOM.createRoot(el).render(<UserCard {...props} />);
    }
}

//////////////////////////////////////////////////////////////////////////////////
//lista de usuario com o react
//userlist
const userListContainer = document.getElementById("react-user-list");
if (userListContainer) {
    const props = JSON.parse(userListContainer.dataset.props);
    createRoot(userListContainer).render(<UserList {...props} />);
}
//usercardlist
const userCardListContainer = document.getElementById("react-user-card-list");
if (userCardListContainer) {
    const props = JSON.parse(userCardListContainer.dataset.props);
    createRoot(userCardListContainer).render(<UserCardList {...props} />);
}

// Monta o botão de redirecionamento
const buttonCadastrar = document.getElementById(
    "react-button-cadastrar-usuario"
);
if (buttonCadastrar) {
    const props = JSON.parse(buttonCadastrar.getAttribute("data-props"));
    ReactDOM.createRoot(buttonCadastrar).render(<Button {...props} />);
}

//monta o footer
const footer = document.getElementById("footer-react");
if (footer) {
    createRoot(footer).render(<Footer />);
}

///////////////////////////////////////////////////////////////////////////////
mountButton("react-button-enviar");
mountButton("react-button-salvar");
mountButton("react-button-cancelar");
mountButton("react-button-excluir");
mountButton("react-button-editar");
mountButton("react-button-logout");
mountButton("react-button-cadastrar");
mountButton("react-button-cadastrar-usuario");
mountButton("react-button-irListarUsuario");
// Montar inputs individuaiscom
mountInput("react-input-cpf");
mountInput("react-input-senha");
mountInput("react-input-email");
mountInput("react-input-nome");

// Montar formulário completo, se existir
mountForm("login-form-root");

//monta o usercard
mountUserCard("react-user-card");
