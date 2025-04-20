// resources/js/components/Header.jsx
import React from "react";
import { SignOut } from "phosphor-react";

const Header = ({ isAuthenticated, logoutUrl, csrfToken }) => {
    return (
        <header style={styles.header}>
            <div style={styles.container}>
                <h1 style={styles.title}>Aplicação de Login</h1>

                {isAuthenticated && (
                    <form method="POST" action={logoutUrl}>
                        <input type="hidden" name="_token" value={csrfToken} />
                        <button type="submit" style={styles.button}>
                            Sair <SignOut size={18} />
                        </button>
                    </form>
                )}
            </div>
        </header>
    );
};

const styles = {
    header: {
        backgroundColor: "#252628",
        color: "#fff",
        padding: "1rem 0",
    },
    container: {
        maxWidth: "1200px",
        margin: "0 auto",
        padding: "0 1rem",
        display: "flex",
        justifyContent: "space-between",
        alignItems: "center",
    },
    title: {
        margin: 0,
        fontSize: "1.5rem",
    },
    button: {
        display: "flex",
        alignItems: "center",
        gap: "8px",
        width: "100%",
        backgroundColor: "#FF7F00",
        color: "#fff",
        border: "none",
        padding: "0.5rem 1rem",
        cursor: "pointer",
        fontWeight: "bold",
        borderRadius: "4px",
    },
};

export default Header;
