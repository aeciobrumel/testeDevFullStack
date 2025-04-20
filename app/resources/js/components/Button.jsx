import React from "react";

const Button = ({
    children,
    onClick,
    onClickUrl,
    type = "submit",
    color = "#d46d23",
    fullWidth = false,
}) => {
    const handleClick = (e) => {
        if (onClickUrl) {
            e.preventDefault(); // Evita envio de formulário ao redirecionar
            window.location.href = onClickUrl;
            return;
        }

        if (onClick) {
            onClick(e);
        }
    };
    return (
        <button
            type={onClickUrl ? "button" : type}
            onClick={handleClick}
            style={{
                padding: "0.75rem 1.5rem",
                backgroundColor: color,
                color: "#ffffff",
                border: "none",
                borderRadius: "8px",
                cursor: "pointer",
                width: fullWidth ? "100%" : "auto",
                fontSize: "1rem",
                fontWeight: "bold",
                transition: "background .3s",
            }}
        >
            {children}
        </button>
    );
};
export default Button;
