

/* /** Format of detected code. */
interface QrcodeResultFormat {
    format: Html5QrcodeSupportedFormats;
    formatName: string;
}

/** Detailed scan result. */
interface QrcodeResult {
    text: string;
    format: QrcodeResultFormat,
}

/** QrCode result object. */
interface Html5QrcodeResult {
    decodedText: string;
    result: QrcodeResult;
}

type QrcodeSuccessCallback
    = (decodedText: string, result: Html5QrcodeResult) => void;

class Html5Qrcode {
    constructor(elementId: string, config: Html5QrcodeFullConfig) {}

    /** Start scanning. */
    start(cameraIdOrConfig: Html5QrcodeIdentifier,
        configuration: Html5QrcodeCameraScanConfig | undefined,
        qrCodeSuccessCallback: QrcodeSuccessCallback | undefined,
        qrCodeErrorCallback: QrcodeErrorCallback | undefined,
    ): Promise<null> {}

    /** Stop scanning. */
    stop(): Promise<void> {}

    /** Clear the rendered surface. */
    clear(): void {}

    /** Scan a file. */
    scanFile(
        imageFile: File,
        showImage?: boolean): Promise<string> {}

    /** Returns list of cameras in the device, invokes permission request. */
    static getCameras(): Promise<Array<CameraDevice>> {}
}