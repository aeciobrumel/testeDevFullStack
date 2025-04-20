import React from "react";
import UserCard from "./UserCard";

const UserCardList = ({ users, currentUser }) => {
    return (
        <div
            style={{
                display: "flex",
                flexDirection: "column",
                gap: "10px",
                marginTop: "30px",
            }}
        >
            {users.map((user) => (
                <UserCard
                    key={user.id}
                    user={user}
                    canEdit={
                        currentUser.permissao === "admin" ||
                        currentUser.permissao === "moderador"
                    }
                    canDelete={currentUser.permissao === "admin"}
                />
            ))}
        </div>
    );
};

export default UserCardList;
