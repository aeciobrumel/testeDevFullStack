import React, { useState, useRef, useEffect } from "react";

const UserCard = ({ user, canEdit, canDelete }) => {
    const [dropdownOpen, setDropdownOpen] = useState(null);
    const dropdownRef = useRef(null);

    const toggleDropdown = (id) => {
        setDropdownOpen(dropdownOpen === id ? null : id);
    };

    // Fecha o dropdown ao clicar fora
    useEffect(() => {
        function handleClickOutside(event) {
            if (
                dropdownRef.current &&
                !dropdownRef.current.contains(event.target)
            ) {
                setDropdownOpen(null);
            }
        }

        document.addEventListener("mousedown", handleClickOutside);
        return () => {
            document.removeEventListener("mousedown", handleClickOutside);
        };
    }, []);

    return (
        <div
            style={{
                display: "flex",
                alignItems: "center",
                justifyContent: "space-between",
                padding: "12px",
                marginBottom: "10px",
                borderRadius: "10px",
                backgroundColor: "#f0f1f2",
                boxShadow: "0 2px 6px rgba(0, 0, 0, 0.1)",
            }}
        >
            <div style={{ display: "flex", alignItems: "center" }}>
                <div
                    style={{
                        width: 40,
                        height: 40,
                        borderRadius: "50%",
                        backgroundColor: "#d46d23",
                        display: "flex",
                        justifyContent: "center",
                        alignItems: "center",
                        color: "white",
                        fontSize: 20,
                        marginRight: 10,
                    }}
                >
                    s
                </div>
                <div>
                    <div style={{ fontSize: 13, color: "#666" }}>
                        {user.email || "sem email"}
                    </div>
                    <div>
                        <strong>{user.nome}</strong>
                    </div>
                </div>
            </div>

            <div
                style={{ position: "relative", display: "inline-block" }}
                ref={dropdownRef}
            >
                <button
                    onClick={() => toggleDropdown(user.id)}
                    style={{
                        background: "#6c757d",
                        color: "white",
                        border: "none",
                        padding: "6px 12px",
                        borderRadius: "5px",
                        cursor: "pointer",
                    }}
                >
                    Ações ⏷
                </button>

                {dropdownOpen === user.id && (
                    <div
                        style={{
                            position: "absolute",
                            top: "100%",
                            right: 0,
                            background: "white",
                            boxShadow: "0 4px 8px rgba(0, 0, 0, 0.1)",
                            borderRadius: "5px",
                            zIndex: 999,
                            minWidth: "120px",
                        }}
                    >
                        {canEdit && (
                            <a
                                href={`/usuario/${user.id}/editar`}
                                style={{
                                    display: "block",
                                    padding: "8px 12px",
                                    color: "#4b7bec",
                                    textDecoration: "none",
                                    borderBottom: "1px solid #eee",
                                }}
                            >
                                ✏️ Editar
                            </a>
                        )}
                        {canDelete && (
                            <form
                                method="POST"
                                action={`/usuario/${user.id}`}
                                onSubmit={(e) => {
                                    if (
                                        !confirm(
                                            "Tem certeza que deseja excluir?"
                                        )
                                    ) {
                                        e.preventDefault();
                                    }
                                }}
                            >
                                <input
                                    type="hidden"
                                    name="_method"
                                    value="DELETE"
                                />
                                <input
                                    type="hidden"
                                    name="_token"
                                    value={
                                        document.querySelector(
                                            'meta[name="csrf-token"]'
                                        ).content
                                    }
                                />
                                <button
                                    type="submit"
                                    style={{
                                        display: "block",
                                        width: "100%",
                                        padding: "8px 12px",
                                        background: "none",
                                        border: "none",
                                        color: "#eb3b5a",
                                        textAlign: "left",
                                        cursor: "pointer",
                                    }}
                                >
                                    🗑️ Excluir
                                </button>
                            </form>
                        )}
                    </div>
                )}
            </div>
        </div>
    );
};

export default UserCard;
