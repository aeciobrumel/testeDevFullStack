import React from "react";
import Input from "./Input";
import Button from "./Button";

const LoginForm = () => {
    const wrapperStyle = {
        display: "flex",
        justifyContent: "center",
        alignItems: "center",
        height: "100vh",
        backgroundColor: "#f0f0f5",
    };

    const formStyle = {
        backgroundColor: "#fff",
        padding: "2rem",
        borderRadius: "12px",
        boxShadow: "0 4px 20px rgba(0, 0, 0, 0.1)",
        width: "100%",
        maxWidth: "400px",
    };

    const titleStyle = {
        marginBottom: "1.5rem",
        textAlign: "center",
        fontSize: "1.5rem",
        color: "#333",
    };

    return (
        <div style={wrapperStyle}>
            <form method="POST" action="/login" style={formStyle}>
                <input
                    type="hidden"
                    name="_token"
                    value={
                        document
                            .querySelector('meta[name="csrf-token"]')
                            ?.getAttribute("content") || ""
                    }
                />

                <h2 style={titleStyle}>Entrar</h2>

                <Input
                    label="CPF"
                    name="cpf"
                    placeholder="Digite seu CPF"
                    required={true}
                />

                <Input
                    label="Senha"
                    name="senha"
                    type="password"
                    placeholder="Digite sua senha"
                    required={true}
                />

                <div style={{ marginTop: "1.5rem" }}>
                    <Button type="submit" fullWidth color="#6f42c1">
                        Entrar
                    </Button>
                </div>
            </form>
        </div>
    );
};

export default LoginForm;
