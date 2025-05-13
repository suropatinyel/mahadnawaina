const { app, BrowserWindow } = require("electron");

let mainWindow;

app.whenReady().then(() => {
    mainWindow = new BrowserWindow({
        width: 1200,
        height: 800,
        webPreferences: {
            nodeIntegration: true,
        },
    });

    mainWindow.loadURL("http://127.0.0.1:8000"); // Adjust URL based on your Laravel server
});
app.on("ready", () => {
    mainWindow.loadURL("http://127.0.0.1:8000");
    mainWindow.webContents.openDevTools();
});

app.on("window-all-closed", () => {
    if (process.platform !== "darwin") {
        app.quit();
    }
});