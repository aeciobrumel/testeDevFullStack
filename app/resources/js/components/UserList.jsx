import React from "react";

export default function UserList({
    users,
    currentUser,
    editarRoute,
    excluirRoute,
    csrfToken,
}) {
    return (
        <div style={{ marginTop: "20px" }}>
            {users.map((user) => (
                <div
                    key={user.id}
                    style={{
                        border: "1px solid #ccc",
                        padding: 10,
                        marginBottom: 10,
                    }}
                >
                    <p>
                        <strong>Nome:</strong> {user.nome}
                    </p>
                    <p>
                        <strong>Email:</strong> {user.email}
                    </p>
                    <p>
                        <strong>Permissão:</strong> {user.permissao}
                    </p>

                    {(currentUser.permissao === "admin" ||
                        currentUser.permissao === "moderador") && (
                        <a
                            href={`/usuario/${user.id}/editar`}
                            style={{
                                marginRight: 10,
                                backgroundColor: "#0275d8",
                                color: "white",
                                padding: "6px 10px",
                                borderRadius: "4px",
                                height: 30,
                            }}
                        >
                            Editar
                        </a>
                    )}

                    {currentUser.permissao === "admin" && (
                        <form
                            className="form-pequeno"
                            action={`/usuario/${user.id}`}
                            method="POST"
                            style={{ display: "inline" }}
                        >
                            <input
                                type="hidden"
                                name="_token"
                                value={csrfToken}
                            />
                            <input
                                type="hidden"
                                name="_method"
                                value="DELETE"
                            />
                            <button
                                type="submit"
                                onClick={(e) => {
                                    if (
                                        !confirm(
                                            "Tem certeza que deseja excluir?"
                                        )
                                    )
                                        e.preventDefault();
                                }}
                                style={{
                                    padding: "6px 12px",
                                    fontSize: "14px",
                                    backgroundColor: "#d9534f",
                                    color: "white",
                                    border: "none",
                                    borderRadius: "4px",
                                    cursor: "pointer",
                                    display: "inline-block",
                                    height: 30,
                                }}
                            >
                                Excluir
                            </button>
                        </form>
                    )}
                </div>
            ))}
        </div>
    );
}
