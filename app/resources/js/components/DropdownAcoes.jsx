import React, { useState } from "react";

const DropdownAcoes = ({ editarUrl, excluirUrl }) => {
    const [aberto, setAberto] = useState(false);

    const toggleDropdown = () => setAberto(!aberto);

    const handleExcluir = () => {
        if (confirm("Tem certeza que deseja excluir?")) {
            const form = document.createElement("form");
            form.method = "POST";
            form.action = excluirUrl;

            const csrf = document.querySelector('meta[name="csrf-token"]');
            const methodInput = document.createElement("input");
            methodInput.type = "hidden";
            methodInput.name = "_method";
            methodInput.value = "DELETE";

            const tokenInput = document.createElement("input");
            tokenInput.type = "hidden";
            tokenInput.name = "_token";
            tokenInput.value = csrf?.getAttribute("content") || "";

            form.appendChild(methodInput);
            form.appendChild(tokenInput);

            document.body.appendChild(form);
            form.submit();
        }
    };

    return (
        <div style={{ position: "relative", display: "inline-block" }}>
            <button type="button" onClick={toggleDropdown}>
                Ações ▾
            </button>
            {aberto && (
                <div
                    style={{
                        position: "absolute",
                        top: "100%",
                        left: 0,
                        backgroundColor: "#fff",
                        border: "1px solid #ccc",
                        padding: "0.5rem",
                        zIndex: 100,
                        minWidth: "100px",
                    }}
                >
                    <a href={editarUrl}>Editar</a>
                    <br />
                    <button type="button" onClick={handleExcluir}>
                        Excluir
                    </button>
                </div>
            )}
        </div>
    );
};

export default DropdownAcoes;
