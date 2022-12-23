import {
    Entity,
    Tree,
    Column,
    PrimaryGeneratedColumn,
    TreeChildren,
    TreeParent,
    TreeLevelColumn,
} from "typeorm"

@Entity('users')
@Tree("nested-set")
export class User {

    @PrimaryGeneratedColumn('increment')
    id:number;

    @Column({
        nullable: false
    })
    firstName:string

    @Column({
        nullable: false
    })
    lastName:string

    @Column({
        nullable: false,
        unique: true
    })
    email:string

    @Column({
        nullable: false
    })
    password:string
}
