// resources/js/components/Footer.jsx
import React from "react";

const Footer = () => {
    return (
        <footer style={styles.footer}>
            <div style={styles.container}>
                <p style={styles.text}>
                    © {new Date().getFullYear()} Desenvolvido por Brumel
                </p>
            </div>
        </footer>
    );
};

const styles = {
    footer: {
        backgroundColor: "#17181a",
        color: "#fff",
        padding: "1rem 0",
        textAlign: "center",
    },
    container: {
        maxWidth: "1200px",
        margin: "0 auto",
        padding: "0 1rem",
    },
    text: {
        margin: 0,
        fontSize: "0.9rem",
    },
};

export default Footer;
