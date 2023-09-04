import { IResourceComponentsProps, GetListResponse } from "@refinedev/core";
import { MuiInferencer } from "@refinedev/inferencer/mui";

export const PaymentBillsList: React.FC<IResourceComponentsProps<GetListResponse<{}>>> = () => {
    return <MuiInferencer />;
};
