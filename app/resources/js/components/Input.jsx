import React from "react";

const Input = ({ label, name, type = "text", placeholder, required }) => {
    return (
        <div style={{ marginBottom: "1rem" }}>
            <label
                htmlFor={name}
                style={{ display: "block", marginBottom: "0.5rem" }}
            >
                {label}
            </label>
            <input
                type={type}
                name={name}
                id={name}
                required={required}
                placeholder={placeholder}
                style={{
                    padding: "0.5rem",
                    border: "1px solid #ccc",
                    borderRadius: "4px",
                    width: "100%",
                }}
            />
        </div>
    );
};

export default Input;
